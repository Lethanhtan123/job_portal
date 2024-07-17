<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Collection;
class DashboardController extends Controller
{
    function index(): View
    {
        $totalCandidate = Candidate::count();
        $totalCompany = Company::count();
        $totalBlogs = Blog::count();
        $totalJobs = Job::count();
        $totalActiveJobs = Job::where('deadline', '>=', date('Y-m-d'))->count();
        $totalExpiredJobs = Job::where('deadline', '<', date('Y-m-d'))->count();
        $totalPendingJobs = Job::where('status','pending')->count();

        //Lấy top 5 job_category_id xuất hiện nhiều nhất trong bảng jobs
        $topJobCategoryIds = DB::table('jobs')
        ->select('job_category_id', DB::raw('COUNT(*) as job_count'))
        ->groupBy('job_category_id')
        ->orderBy('job_count', 'desc')
        ->limit(5)
        ->pluck('job_category_id');

        //Lấy thông tin `name` từ bảng `JobCategory` cho những `job_category_id` này
        $topJobCategories = DB::table('job_categories')
        ->whereIn('id', $topJobCategoryIds)
        ->select('id', 'name')
        ->get();

        //Chuyển mảng job_category_id thành mảng tên job_category
        $topJobCategoriesArray = $topJobCategories->pluck('name')->toArray();

        //Lấy số lượng công việc cho mỗi loại công việc
        $yValues = $topJobCategories->map(function ($item) {
                return DB::table('jobs')->where('job_category_id', $item->id)->count();
            })->toArray();


        //Lấy top 5 city_id xuất hiện nhiều nhất trong bảng jobs
        $CityIds = DB::table('jobs')
            ->select('city_id', DB::raw('COUNT(*) as job_count'))
            ->groupBy('city_id')
            ->orderBy('job_count', 'desc')
            ->limit(5)
            ->pluck('city_id');

        //Lấy thông tin `name` từ bảng `Cities` cho những `city_id` này
        $City = DB::table('cities')
            ->whereIn('id', $CityIds)
            ->select('id', 'name')
            ->get();

        //Chuyển mảng city_id thành mảng tên city
        $topCitiesArray = $City->pluck('name')->toArray();

        //Lấy số lượng công việc cho mỗi loại công việc
        $yValues2 = $City->map(function ($item) {
            return DB::table('jobs')->where('city_id', $item->id)->count();
        })->toArray();

        return view('admin.dashboard.index',
        compact('totalCandidate',
         'totalCompany',
         'totalJobs', 'totalActiveJobs',
          'totalExpiredJobs',
          'totalPendingJobs',
          'totalBlogs',
          'yValues',
          'topJobCategoriesArray',
          'yValues2',
          'topCitiesArray'
        ));
    }
}
