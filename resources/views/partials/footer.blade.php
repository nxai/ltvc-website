<footer class="ltvc-footer mt-5">
    <div class="footer-top-border"></div>

    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-info">
                    @if(isset($siteLogo) && $siteLogo)
                        <img src="{{ asset('storage/' . $siteLogo) }}" alt="LTVC Logo" class="footer-logo mb-3">
                    @else
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-mortarboard-fill text-warning fs-1 me-2"></i>
                            <h2 class="fw-bold text-white mb-0">LTVC</h2>
                        </div>
                    @endif
                    <p class="text-white-50 small pe-lg-4">
                        ວິທະຍາໄລ ເຕັກນິກ-ວິຊາຊີບ ຫຼວງພະບາງ ສ້າງຕັ້ງຂຶ້ນເພື່ອພັດທະນາຊັບພະຍາກອນມະນຸດ 
                        ໃຫ້ມີວິຊາຊີບທີ່ທັນສະໄໝ ແລະ ຕອບສະໜອງຄວາມຕ້ອງການຂອງສັງຄົມ.
                    </p>
                    <div class="social-icons d-flex gap-2 mt-4">
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-youtube"></i></a>
                        <a href="#" class="btn-social shadow-sm"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-6">
                <h5 class="footer-heading fw-bold text-white mb-4">ລິ້ງດ່ວນ</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/') }}">ໜ້າຫຼັກ</a></li>
                    <li><a href="{{ url('/departments') }}">ພາກວິຊາ</a></li>
                    <li><a href="{{ url('/news') }}">ຂ່າວສານ</a></li>
                    <li><a href="#">ກ່ຽວກັບພວກເຮົາ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-6 text-white">
                <h5 class="footer-heading fw-bold text-white mb-4">ຕິດຕໍ່ພວກເຮົາ</h5>
                <div class="contact-item mb-3 d-flex">
                    <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">ບ້ານ ປ່າຂາມ, ນະຄອນ ຫຼວງພະບາງ, ແຂວງ ຫຼວງພະບາງ</p>
                </div>
                <div class="contact-item mb-3 d-flex">
                    <i class="bi bi-telephone-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">+856 71 212 123</p>
                </div>
                <div class="contact-item d-flex">
                    <i class="bi bi-envelope-at-fill text-warning me-2"></i>
                    <p class="small mb-0 text-white-50">info@ltvc.edu.la</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="footer-heading fw-bold text-white mb-4">ທີ່ຕັ້ງວິທະຍາໄລ</h5>
                <div class="rounded-4 overflow-hidden border border-secondary shadow-sm" style="height: 150px;">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.328362627052!2d102.133203!3d19.882142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDUyJzU1LjciTiAxMDLCsDA4JzAwLjAiRQ!5e0!3m2!1slo!2sla!4v1620000000000!5m2!1slo!2sla" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-3">
        <div class="container text-center">
            <p class="mb-0 small text-white-50">
                &copy; {{ date('Y') }} <span class="text-warning fw-bold">Luangprabang Technical-Vocational College</span>. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
