import { Booking,BookingSvg, CabSvg3, CarSvg, HappyClient, HolidaySvg } from "../../../Data/Svg";
import IntercityCommon from "../../Cab/Service/IntercityCommon";

const ChooseUs= () => {
    const startData = [
        {
          svg: <CabSvg3 />,
          title: "Integrated Fleet Solutions Provider",
          desc: "Unifies vehicle services, providing comprehensive solutions for diverse travel needs.",
        },
        {
          svg: <HappyClient />,
          title: "Experienced Car Rental Experts",
          desc: "Expert team ensures seamless rentals, backed by extensive industry knowledge and experience.",
        },
        {
          svg: <HolidaySvg />,
          title: "Served a Thousand+ Travelers",
          desc: "Catered to a vast clientele, exceeding a thousand travelers, ensuring satisfaction and reliability.",
        },
        {
          svg: <Booking />,
          title: "Extensive Geographical Coverage",
          desc: "Extensive coverage ensures efficient service delivery across diverse regions for client convenience.",
        },
        {
            svg: <BookingSvg />,
            title: "24/7 Operations with Online Integration",
            desc: "Seamless round-the-clock service available through integrated online packages.",
          },
          {
            svg: <CarSvg />,
            title: "Commitment to Top-Tier Service",
            desc: "Deliver exceptional service, setting a global standard for excellence in customer satisfaction and experiences.",
          },
      ];
    return (
      <section className="about-section pt-0 section-b-space bg-white">
        <div className="container">
          <div className="title-1 detail-title">
            <h2>Why Choose Sewak Travels for Intercity Cab Service in Delhi?</h2>
            <p>{"At Sewak Travels, we are more than just a transportation company; we are your trusted travel companion, committed to enhancing every step of your journey. With our unwavering dedication to excellence and customer satisfaction, we strive to exceed your expectations with every ride."}</p>
          </div>
          <div className="highlight-section">
            <div className="row">
              <IntercityCommon intercityData={startData} />
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default ChooseUs;