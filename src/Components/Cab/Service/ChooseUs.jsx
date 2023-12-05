import { Booking, Capa2, HappyClient, Location } from "../../../Data/Svg";
import AboutCommon from "./AboutCommon";

const ChooseUs= () => {
    const startData = [
        {
          svg: <Capa2 />,
          title: "4500 + exclusive hotels",
          desc: "4500 + exclusive hotels are included in Sewak Travels hotel.",
        },
        {
          svg: <HappyClient />,
          title: "3,00,000 happy client",
          desc: "Sewak Travels cab has more than 3 lakhs happy customer",
        },
        {
          svg: <Location />,
          title: "4500 + exclusive hotels",
          desc: "Sewak Travels cab has more than 45k location at different countries",
        },
        {
          svg: <Booking />,
          title: "1.5m bookings",
          desc: "Sewak Travels hotels has more than 1.5 hotel bookings.",
        },
      ];
    return (
      <section className="about-section pt-0 section-b-space bg-white">
        <div className="container">
          <div className="title-1 detail-title">
            <h2>why choose Sewak Travels?</h2>
            <p>{"At Sewak Travels, we have a mission to exceed our customers' expectations through professional, courteous, and timely ground transportation solutions. We want to create business opportunities for our drivers and ideal work culture for our employees."}</p>
          </div>
          <div className="highlight-section">
            <div className="row">
              <AboutCommon aboutData={startData} />
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default ChooseUs;