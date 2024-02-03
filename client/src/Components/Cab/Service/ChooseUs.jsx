import { Booking, Capa2, HappyClient, Location } from "../../../Data/Svg";
import AboutCommon from "./AboutCommon";

const ChooseUs= () => {
    const startData = [
        {
          svg: <Capa2 />,
          title: "24/7 Customer Support",
          desc: "Our commitment to round-the-clock customer support ensures assistance whenever you need it. Whether booking, inquiries, or addressing concerns, our team is here, to ensure a seamless experience throughout your journey.",
        },
        {
          svg: <HappyClient />,
          title: "Good Quality Cars",
          desc: "We pride ourselves on a fleet of top-notch, well-maintained vehicles, promising a comfortable and reliable ride every time. From sedans to SUVs, each car undergoes rigorous checks for your safety and satisfaction.",
        },
        {
          svg: <Location />,
          title: "Experienced Drivers",
          desc: "Our drivers are more than just chauffeurs; they are professionals committed to your safety and comfort. Vetted for expertise and courteous service, they ensure a smooth and enjoyable ride, prioritizing your well-being at every turn.",
        },
        {
          svg: <Booking />,
          title: "Attractive Offers",
          desc: "We believe in offering value. Our array of enticing deals, discounts, and packages cater to diverse needs, providing cost-effective solutions without compromising on quality or comfort.",
        },
      ];
    return (
      <section className="about-section pt-0 section-b-space bg-white">
        <div className="container">
          <div className="title-1 detail-title">
            <h2>Why Choose Sewak Travels?</h2>
            <p>{"Customer's Choice: Reasons for Choosing Us!"}</p>
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