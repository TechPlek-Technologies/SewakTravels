import Animation from "../../../Common/Animation";
import Img from "../../../Common/Img";
import TitleComponent from "../../../Common/TitleComponent";

const FactsContent= () => {
    const factsData = [
        { icon: "/assets/images/icon/facts/1.png", counter: 2745, label: "happy client" },
        { icon: "/assets/images/icon/facts/2.png", counter: 953, label: "complete tour" },
        { icon: "/assets/images/icon/facts/3.png", counter: 450, label: "guiders" },
        { icon: "/assets/images/icon/facts/4.png", counter: 180, label: "tour country" },
      ];
    return (
      <section className="facts-section animated-section section-b-space">
        <Img src="/assets/images/cab/grey-bg.jpg" alt="" className="img-fluid bg-img" />
        <Animation />
        <div className="container">
          <TitleComponent title={"Sewak"} subTitle={"no stories, facts only"} span={"Customer"} titleClass={"title-3"} />
          <div className="row">
            {factsData.map((fact, index) => (
              <div key={index} className="col-lg-3 col-6">
                <div className="facts-box">
                  <div>
                    <div className="img">
                      <Img src={fact.icon} className="img-fluid" alt="" />
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
  
  export default FactsContent;
  