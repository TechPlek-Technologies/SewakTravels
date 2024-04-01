import { Link } from "react-router-dom";
import BackgroundSection from "../../Common/BackgroundSection";
import TitleComponent from "../../Common/TitleComponent";
import CabAnimation from "../CallService/CabAnimation";
import Rating from "../Home/Testimonials/Rating";
import { BookingSvg, CabSvg1, CarSvg,CabSvg4 } from "../../../Data/Svg";
import Button from "../../Common/Button";

const ServiceComponent= () => {
  const serviceCabData = [
    {
      id: 1,
      svg: <CabSvg4 />,
      title: "Outstation Cab Services",
      desc: "Choose Sewak Travels for ultimate convenience, comfort, and reliable outstation taxi services. Experience seamless travel exceeding expectations, ensuring satisfaction and peace of mind throughout your journey.",
      price: "15% discount",
      path:"/outstation-cab-taxi-service"
    },
    {
      id: 2,
      svg: <CabSvg1 />,
      title: "Airport Transport Services",
      desc: "Travel in style and convenience with Sewak Travels to the airport. Our airport cab bookings feature cutting-edge technology and background-verified drivers, ensuring a safe and comfortable ride. Start your journey right with Sewak Travels.",
      price: "15% discount",
      path:"/airport-cab-taxi-transport-service"

    },
    {
      id: 3,
      svg: <CarSvg />,

      title: "Employee Transport Services",
      desc: "Elevate employee transportation with Sewak Travels, providing seamless and reliable solutions. Our comprehensive services ensure stress-free travel for your workforce, promoting productivity and satisfaction. Trust us for a smooth commuting experience.",
      price: "15% discount",
      path:"/employee-cab-taxi-transport-service"

    },
    {
      id: 4,
      svg: <BookingSvg />,

      title: "Intercity Taxi Transport Services",
      desc: "Enjoy hassle-free intercity taxi services with Sewak Travels, your trusted tour & travel agency. Our dedicated fleet, driven by experienced professionals, ensures prompt and comfortable transportation. Explore the city with ease and exceptional service.",
      price: "15% discount",
      path:"/intercity-cab-taxi-service"

    },
  ];
    return (
      <BackgroundSection titleClass={"section-b-space dark-cls animated-section"}  imgWidth={0} imgHeight={0} position={"center"}>
        <CabAnimation />
        <div className="container">
        <TitleComponent title={"Sewak Travels"} subTitle={"Efficient and Affordable Cab Solutions!"} span={"Facilities"} titleClass={"title-3"} />
          <div className="row service-section">
            {serviceCabData.map((data,index) => (
              <div className="col-lg-3" key={index}>
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