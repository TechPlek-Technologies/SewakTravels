const IntercityService = ({ side }) => {
    return (
        <section className="section-b-space process-steps">
        <img src="../assets/images/cab/app-bg.jpg" className="img-fluid blur-up lazyload bg-img" alt=""/>
        <div className="container">
            <div className="title-1 detail-title">
                <h2 className="pt-0">Enjoy Limitless Adventures with our Intercity Taxi Service</h2>
                <h3 className="services-h3">Connecting Destinations, Creating Memories</h3>
            </div>
            <div className="step-bg">
                <div className="row">
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/destination.png"
                                    className="img-fluid lazyload" alt=""/>
                                <h4>Assistance with Route Planning</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/mobile-app.png"
                                    className="img-fluid lazyload" alt=""/>
                                <h4>Excellent Customer Support</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="/assets/images/icon/cab-steps/taxi-cab.png" className="img-fluid lazyload"
                                    alt=""/>
                                <h4>On-board Amenities</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/confirm-schedule.png"
                                    className="img-fluid lazyload" alt=""/>
                                <h4>Flexible Scheduling</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    );
};

export default IntercityService;
