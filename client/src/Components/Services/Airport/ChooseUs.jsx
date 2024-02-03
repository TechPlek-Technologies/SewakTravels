import { Booking, Capa2, HappyClient, Location } from "../../../Data/Svg";
import AboutCommon from "../../Cab/Service/AboutCommon";

const ChooseUs= () => {
    const startData = [
        {
          svg: <Capa2 />,
          title: "Reliable Fleet",
          desc: "Our meticulously maintained vehicles ensure a safe and comfortable journey for every passenger.",
        },
        {
          svg: <HappyClient />,
          title: "Seamless Booking",
          desc: "With easy online booking options and responsive customer support, planning your outstation trip with Sewak is effortless.",
        },
        {
          svg: <Location />,
          title: "Professional Drivers",
          desc: "Our experienced and courteous drivers prioritize your safety and satisfaction, guaranteeing a smooth and enjoyable ride.",
        },
        {
          svg: <Booking />,
          title: "Competitive Pricing",
          desc: "Enjoy cost-effective outstation travel without compromising on quality service, thanks to our competitive pricing and transparent billing.",
        },
      ];
    return (
      <section className="about-section pt-0 section-b-space bg-white">
        <div className="container">
          <div className="title-1 detail-title">
            <h2>Why Choose Sewak Airport Services?</h2>
            <p>{"Catch your big flight stress-free and in style with our airport cab services. Our commitment to top-notch service ensures clean and modern vehicles paired with professional, background-checked drivers, guaranteeing a smooth and comfortable ride to the airport. "}</p>
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