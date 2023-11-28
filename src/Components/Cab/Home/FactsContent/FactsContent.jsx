import Animation from "../../../Common/Animation";
import TitleComponent from "../../../Common/TitleComponent";

const FactsContent= () => {
    const factsData = [
        { icon: "/assets/images/icon/facts/1.png", counter: 2745, label: "Happy Client" },
        { icon: "/assets/images/icon/facts/2.png", counter: 953, label: "Complete Tour" },
        { icon: "/assets/images/icon/facts/3.png", counter: 450, label: "Guiders" },
        { icon: "/assets/images/icon/facts/4.png", counter: 29, label: "Tour States" },
      ];
    return (
      <section className="testimonial-section  animated-section">
        <Animation />
        <div className="container">
          <TitleComponent title={"Sewak"} subTitle={"no stories, facts only"} span={"Portfolio"} titleClass={"title-3"} />
         
          <div className="row">
            {factsData.map((fact, index) => (
              <div key={index} className="col-lg-3 col-6">
                <div className="facts-box">
                  <div>
                    
                    <h1 className="counter" style={{color:"#ef3f3e"}}>{fact.counter}</h1>
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
  
  export default FactsContent;
  