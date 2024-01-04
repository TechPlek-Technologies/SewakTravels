import { Link } from "react-router-dom";
import BackgroundSection from "../../Common/BackgroundSection";
import TitleComponent from "../../Common/TitleComponent";
import CabAnimation from "../CallService/CabAnimation";
import Rating from "../Home/Testimonials/Rating";
import { BookingSvg, CabSvg1, CarSvg } from "../../../Data/Svg";
import Button from "../../Common/Button";

const ServiceComponent= () => {
  const serviceCabData = [
    {
      id: 1,
      svg: <BookingSvg />,
      title: "OutStation",
      desc: "SewakTravels.com: Your go-to for Car & Coach rentals in Gurugram, Delhi & NCR. Choose from Compact, Mini Van, Luxury, and more. Reliable service, expert drivers.",
      price: "15% discount",
      path:"/service/outstation"
    },
    {
      id: 2,
      svg: <CabSvg1 />,
      title: "Airport Pick & Drop",
      desc: "At Sewak Travels, we guarantee hassle-free Airport Taxi services in Gurgaon and Delhi, NCR. Call us anytime for instant bookings and choose from various options. Connect with our consultants effortlessly.",
      price: "15% discount",
      path:"/service/airport"

    },
    {
      id: 3,
      svg: <CarSvg />,

      title: "Corporate Booking",
      desc: "Leading employee transport service in Delhi, NCR, offering seamless solutions with routing, tracking, and enhanced security features. Tailored for corporate excellence.",
      price: "15% discount",
      path:"/service/corporate"

    },
  ];
    return (
      <BackgroundSection titleClass={"section-b-space dark-cls animated-section"}  imgWidth={0} imgHeight={0} position={"center"}>
        <CabAnimation />
        <div className="container">
        <TitleComponent title={"Sewak Travels"} subTitle={"Our Facilities"} span={"Facilities"} titleClass={"title-3"} />
          <div className="row service-section">
            {serviceCabData.map((data,index) => (
              <div className="col-lg-4" key={index}>
                <div className="service-box">
                  <div>
                    <div className="service-icon">{data.svg}</div>
                    <h3>{data.title}</h3>
                    <p>{data.desc}</p>
                    <div className="lower-section">
                      <Rating />
                      <h6>{data.price}</h6>
                    </div>
                    <Link to={data.path}><Button btnClass="btn btn-curve btn-lower color1" name={"Learn More"} /></Link>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </BackgroundSection>
    );
  };
  
  export default ServiceComponent;