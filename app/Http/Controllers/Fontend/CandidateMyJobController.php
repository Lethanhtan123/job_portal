<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateMyJobController extends Controller
{
    function index() : View {

        $appliedJobs = AppliedJob::with('job')->where('candidate_id',auth()->user()->id)->paginate(10);

        return view('fontend.candidate-dashboard.my-job.index',compact('appliedJobs'));
    }

    public function destroy(string $id)
    {
        try {
            $applied = AppliedJob::findOrFail($id);
            if (auth()->user()->candidateProfile->id !== $applied->candidate_id) {
                abort(404);
            }
            $applied->delete();
            return response(['message' => 'Xóa dữ liệu thành công!'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Có lỗi xảy ra. Vui lòng thử lại!'], 500);
        }
    }
}
