<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\JobBookmark;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CandidateBookmarkController extends Controller
{
    function index(): View
    {
        $bookmarks = JobBookmark::where('candidate_id', auth()->user()->id)->paginate(10);
        return view('fontend.candidate-dashboard.bookmarks.index', compact('bookmarks'));
    }

    function save(string $id)
    {
        if (!auth()->check()) {
            throw ValidationException::withMessages(['Vui lòng đăng nhập!']);
        }
        if (auth()->check() && auth()->user()->role !== 'candidate') {
            throw ValidationException::withMessages(['Chỉ Ứng viên được lưu bài viết!']);
        }

        $alreadyMarked = JobBookmark::where(['job_id' => $id, 'candidate_id' => auth()->user()->id])->exists();

        if ($alreadyMarked) {
            throw ValidationException::withMessages(['Đã thêm vào danh sách quan tâm!']);
        }

        $bookmark = new JobBookmark();
        $bookmark->job_id = $id;
        $bookmark->candidate_id = auth()->user()->id;
        $bookmark->save();

        return response(['message' => 'Đánh lưu bài viết thành công!', 'id' => $id]);
    }

    public function destroy(string $id)
    {
        try {
            $bookmark = JobBookmark::findOrFail($id);
            if (auth()->user()->candidateProfile->id !== $bookmark->candidate_id) {
                abort(404);
            }
            $bookmark->delete();
            return response(['message' => 'Xóa dữ liệu thành công!'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Có lỗi xảy ra. Vui lòng thử lại!'], 500);
        }
    }
}
