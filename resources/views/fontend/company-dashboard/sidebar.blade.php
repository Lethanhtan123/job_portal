<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="mb-5 box-nav-tabs nav-tavs-profile">
        <ul class="nav" role="tablist">
            <li><a class="mb-20 btn btn-border active" href="{{ route('company.dashboard') }}">Dashboard</a>
            </li>
            <li><a class="mb-20 btn btn-border" href="{{ route('company.profile') }}">My Profile</a></li>
            <li><a class="mb-20 btn btn-border" href="candidate-profile-jobs.html">My Jobs</a></li>
            <li><a class="mb-20 btn btn-border" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="mb-20 btn btn-border"  onclick="event.preventDefault();
                    this.closest('form').submit();" href="{{ route('logout') }}">Logout</a>
                </form>
            </li>
        </ul>
    </div>
</div>
