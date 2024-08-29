const AirportService = ({ side }) => {
    return (
        <section className="section-b-space process-steps">
        <img src="../assets/images/cab/app-bg.jpg" className="img-fluid blur-up lazyload bg-img" alt=""/>
        <div className="container">
            <div className="title-1 detail-title">
                <h3 className="services-h3">Arrive in Comfort, Depart with Ease</h3>
            </div>
            <div className="step-bg">
                <div className="row">
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/destination.png"
                                    className="img-fluid lazyload" alt=""/>
                                <h4>Pick-up and Drop-off</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/mobile-app.png"
                                    className="img-fluid lazyload" alt=""/>
                                <h4>24/7 Availability</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="/assets/images/icon/cab-steps/luggage.png" className="img-fluid lazyload"
                                    alt=""/>
                                <h4>Luggage Assistance</h4>
                            </div>
                        </div>
                    </div>
                    <div className="col-md-3">
                        <div className="step-box wow zoomIn">
                            <div>
                                <img src="../assets/images/icon/cab-steps/confirm-schedule.png"
                                    className="img-fluid lazyload" alt=""/>
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
