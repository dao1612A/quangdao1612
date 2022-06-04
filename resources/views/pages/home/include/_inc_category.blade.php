<section class="section section-specialities">
    <div class="container-fluid">
        <div class="section-header text-center">
            <h2>Phòng khám và Chuyên khoa</h2>
            <p class="sub-title">Gia đình các bé không phải trả bất kỳ chi phí nào khi được bác sĩ tư vấn và khám bệnh</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <!-- Slider -->
                <div class="specialities-slider slider">

                @foreach($categoriesGlobal ?? [] as $item)
                    <!-- Slider Item -->
                        <div class="speicality-item text-center">
                            <div class="speicality-img">
                                <img src="{{ pare_url_file($item->c_avatar) }}" class="img-fluid" alt="{{ $item->c_name }}">
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                            </div>
                            <p>{{ $item->c_name }}</p>
                        </div>
                        <!-- /Slider Item -->
                    @endforeach

                </div>
                <!-- /Slider -->

            </div>
        </div>
    </div>
</section>
