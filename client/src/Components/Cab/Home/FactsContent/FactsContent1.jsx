const FactsContent1= () => {
    const factsData = [
        { icon: "/assets/images/icon/facts/1.png", counter: 2745, label: "Happy Client" },
        { icon: "/assets/images/icon/facts/2.png", counter: 953, label: "Complete Tour" },
        { icon: "/assets/images/icon/facts/3.png", counter: 450, label: "Guiders" },
        { icon: "/assets/images/icon/facts/4.png", counter: 29, label: "Tour States" },
      ];
    return (
        <section className="facts-section animated-section section-b-space">
        <img src="../assets/images/cab/grey-bg.jpg" alt="" className="img-fluid blur-up lazyload bg-img"/>
        <div className="animation-section">
            <div className="cross po-1"></div>
            <div className="cross po-2"></div>
            <div className="cross po-3"></div>
            <div className="round po-4"></div>
            <div className="round po-5"></div>
            <div className="round r-2 po-6"></div>
            <div className="round r-2 po-7"></div>
            <div className="round r-y po-8"></div>
            <div className="round r-y po-9"></div>
            <div className="square po-10"></div>
            <div className="square po-11"></div>
            <div className="square s-2 po-12"></div>
        </div>
        <div className="container">
            <div className="title-1">
                <span className="title-label">Sewak Travels</span>
                <h2>no stories, facts only</h2>
            </div>
            <div className="row">
            {factsData.map((fact, index) => (
                <div key={index} className="col-lg-3 col-6">
                    <div className="facts-box">
                        <div>
                            <div className="img">
                                <img src={fact.icon} className="img-fluid lazyload" alt=""/>
                            </div>
                            <h3 className="counter">{fact.counter}</h3>
                            <h6>{fact.label}</h6>
                        </div>
                    </div>
                </div>
                ))}
            </div>
        </div>
    </section>
    );
  };
  
  export default FactsContent1;
  