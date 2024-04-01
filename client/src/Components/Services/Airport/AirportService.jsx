const AirportService = ({ side }) => {
    return (
        <section class="section-b-space process-steps">
        <img src="../assets/images/cab/app-bg.jpg" class="img-fluid blur-up lazyload bg-img" alt=""/>
        <div class="container">
            <div class="title-1 detail-title">
                <h3 className="services-h3">Arrive in Comfort, Depart with Ease</h3>
            </div>
            <div class="step-bg">
                <div class="row">
                    <div class="col-md-3">
                        <div class="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/destination.png"
                                    class="img-fluid lazyload" alt=""/>
                                <h4>Pick-up and Drop-off</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/mobile-app.png"
                                    class="img-fluid lazyload" alt=""/>
                                <h4>24/7 Availability</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box wow zoomIn">
                            <div>
                                <img src="/assets/svg/cab.svg" class="img-fluid lazyload"
                                    alt=""/>
                                <h4>Luggage Assistance</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/confirm-schedule.png"
                                    class="img-fluid lazyload" alt=""/>
                                <h4>Multiple Payment Options</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    );
};

export default AirportService;
