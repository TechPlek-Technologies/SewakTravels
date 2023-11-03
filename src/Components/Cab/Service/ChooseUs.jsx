import { Booking, Capa2, HappyClient, Location } from "../../../Data/Svg";
import AboutCommon from "./AboutCommon";

const ChooseUs= () => {
    const startData = [
        {
          svg: <Capa2 />,
          title: "4500 + exclusive hotels",
          desc: "4500 + exclusive hotels are included in rica hotel.",
        },
        {
          svg: <HappyClient />,
          title: "3,00,000 happy client",
          desc: "rica cab has more than 3 lakhs happy customer",
        },
        {
          svg: <Location />,
          title: "4500 + exclusive hotels",
          desc: "rica cab has more than 45k location at different countries",
        },
        {
          svg: <Booking />,
          title: "1.5m bookings",
          desc: "rica hotels has more than 1.5 hotel bookings.",
        },
      ];
    return (
      <section className="about-section pt-0 section-b-space bg-white">
        <div className="container">
          <div className="title-1 detail-title">
            <h2>why choose rica?</h2>
            <p>{"Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Adipisci Alias Aperiam At, Aut Commodi Corporis Dolorum Ducimus Labore Magnam Mollitia Natus Porro Possimus Quae Sit Tenetur Veniam Veritatis Voluptate Voluptatem!"}</p>
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