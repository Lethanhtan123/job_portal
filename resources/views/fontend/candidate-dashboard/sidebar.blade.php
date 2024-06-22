<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 active" href="{{ route('candidate.dashboard') }}">Bảng điều khiển</a>
            </li>
            <li><a class="btn btn-border mb-20" href="{{ route('candidate.profile.index') }}">Hồ sơ</a></li>
            <li><a class="btn btn-border mb-20" href="{{ route('candidate.applied-jobs.index') }}">Công việc đã ứng tuyển</a></li>
            <li><a class="btn btn-border mb-20" href="{{ route('candidate.bookmarked-jobs.index') }}">Tin đã lưu</a></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-border mb-20"  onclick="event.preventDefault();
                    this.closest('form').submit();" href="{{ route('logout') }}">Đăng xuất</a>
                </form>
            </li>
        </ul>
    </div>
</div>
