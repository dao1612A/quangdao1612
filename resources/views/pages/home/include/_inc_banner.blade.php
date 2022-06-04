<section class="section section-search">
    <div class="container-fluid">
        <div class="banner-wrapper">
            <div class="banner-header text-center">
                <h1>Tìm kiếm bác sĩ, đặt lịch hẹn</h1>
                <p>Khám phá các bác sĩ tốt nhất, phòng khám & bệnh viện ở thành phố gần bạn nhất.</p>
            </div>

            <!-- Search -->
            <div class="search-box">
                <form action="{{ route('get.doctor.search') }}">
                    <div class="form-group search-location">
                        <input type="text" class="form-control" name="l" placeholder="Địa chỉ">
                        <span class="form-text">Dựa trên vị trí của bạn</span>
                    </div>
                    <div class="form-group search-info">
                        <input type="text" class="form-control" name="k" placeholder="Tìm kiếm bác sĩ, phòng khám, bệnh viện, bệnh tật, v.v.">
                        <span class="form-text">Ví dụ: Khám răng hoặc kiểm tra đường, v.v.</span>
                    </div>
                    <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                </form>
            </div>
            <!-- /Search -->

        </div>
    </div>
</section>
