<x-app-layout>
    <x-page-header title="ຕິດຕໍ່ພວກເຮົາ" subtitle="ພວກເຮົາພ້ອມທີ່ຈະໃຫ້ຂໍ້ມູນ ແລະ ຄຳປຶກສາແກ່ທ່ານ" />

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <h3 class="fw-bold text-primary mb-4">ຂໍ້ມູນການຕິດຕໍ່</h3>
                    
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                        <div class="d-flex mb-4">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-3 me-3">
                                <i class="bi bi-geo-alt-fill fs-3"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">ສະຖານທີ່ຕັ້ງ</h6>
                                <p class="text-muted small mb-0">ບ້ານ ຄອຍ, ນະຄອນ ຫຼວງພະບາງ, ແຂວງ ຫຼວງພະບາງ, ສປປ ລາວ.</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-3 me-3">
                                <i class="bi bi-telephone-fill fs-3"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">ເບີໂທລະສັບຕິດຕໍ່</h6>
                                <p class="text-muted small mb-0">+856 71 212 xxx <br> (ໃນໂມງລັດຖະການ: 8:00 - 16:00)</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="bg-info bg-opacity-10 text-info rounded-3 p-3 me-3">
                                <i class="bi bi-envelope-at-fill fs-3"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">ອີເມວ</h6>
                                <p class="text-muted small mb-0">info@ltvc.edu.la <br> ltvc.lpq@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-4 overflow-hidden shadow-sm border" style="height: 300px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.23456789!2d102.134567!3d19.891234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x312ecxxxxxxxxx%3A0x8xxxxxxxxx!2z4Lia4LmJ4Liy4LiZ4LiE4Lit4LiiIOC4qOC4p-C4seC4meC4p-C4seC4meC4leC4meC4seC4meC4leC4o-C4seC4muC4p-C4seC4meC4geC4p-C4seC4meC4quC4seC4meC4mQ!5e0!3m2!1slo!2sla!4v1700000000000!5m2!1slo!2sla" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                        <h3 class="fw-bold mb-2">ສົ່ງຂໍ້ຄວາມຫາພວກເຮົາ</h3>
                        <p class="text-muted mb-4">ຫາກທ່ານມີຂໍ້ສົງໄສ ຫຼື ຕ້ອງການສອບຖາມຂໍ້ມູນເພີ່ມເຕີມ ສາມາດຝາກຂໍ້ຄວາມໄວ້ໄດ້ທີ່ນີ້.</p>
                        @if(session('success'))
                            <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 animate__animated animate__fadeIn">
                                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">ຊື່ ແລະ ນາມສະກຸນ</label>
                                    <input type="text" class="form-control form-control-lg rounded-3 fs-6" placeholder="ກະລຸນາໃສ່ຊື່ຂອງທ່ານ" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small">ເບີໂທລະສັບ</label>
                                    <input type="tel" class="form-control form-control-lg rounded-3 fs-6" placeholder="020 xxxx xxxx" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">ຫົວຂໍ້</label>
                                    <select class="form-select form-control-lg rounded-3 fs-6">
                                        <option selected disabled>ເລືອກຫົວຂໍ້ທີ່ຕ້ອງການສອບຖາມ</option>
                                        <option>ສອບຖາມເລື່ອງການສະໝັກຮຽນ</option>
                                        <option>ສອບຖາມເລື່ອງຫຼັກສູດ</option>
                                        <option>ຕິດຕໍ່ພົວພັນວຽກງານພາຍນອກ</option>
                                        <option>ອື່ນໆ</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small">ຂໍ້ຄວາມຂອງທ່ານ</label>
                                    <textarea class="form-control rounded-3 fs-6" rows="5" placeholder="ຂຽນລາຍລະອຽດທີ່ທ່ານຕ້ອງການສອບຖາມ..." required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold shadow-sm py-3 transition-all hover-scale">
                                        <i class="bi bi-send-fill me-2"></i> ສົ່ງຂໍ້ຄວາມ
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>