import CabAnimation from "../../CallService/CabAnimation";

const FactsContent2= () => {
    const factsData = [
        { icon: "../assets/images/tour/vector/13.png", counter: 2745, label: "Happy Client" },
        { icon: "/assets/images/icon/facts/2.png", counter: 953, label: "Complete Tour" },
        { icon: "../assets/images/tour/vector/15.png", counter: 450, label: "Guiders" },
        { icon: "../assets/images/tour/vector/16.png", counter: 29, label: "Tour States" },
      ];
    return (
        <section className="small-section process-steps icon-large animated-section">
             <CabAnimation />
        <div className="container">
            <div className="title-1 detail-title">
                <h2 className="pt-0">no stories, facts only</h2>
            </div>
            <div className="step-bg">
                <div className="row">
                {factsData.map((fact, index) => (
                    <div className="col-md-3" key={index}>
                        <div className="step-box">
                            <div>
                                <img src={fact.icon}
                                    className="img-fluid lazyload filter-none" alt=""/>
                                <h1 className="counter" style={{color:"#ef3f3e"}}>{fact.counter}</h1>
                            <h6 style={{fontWeight:"800",fontSize:"18px"}}>{fact.label}</h6>
                            </div>
                        </div>
                    </div>
                     ))}
                </div>
            </div>
        </div>
    </section>
    );
  };
  
  export default FactsContent2;
  