import { Link } from "react-router-dom";
import Animation from "../../Common/Animation";
import TitleComponent from "../../Common/TitleComponent";

const OutstationContent = ({ side }) => {
  const imageData = [
    {
      src: "/assets/img/about/1.webp",
      title: "OutStation",
      subTitle: "OutStation",
      path:"/outstation-cab-taxi-service"
    },
    {
      src: "/assets/img/about/2.webp",
      title: "Airport",
      subTitle: "Airport",
      path:"/airport-cab-taxi-transport-service"
    },
    {
      src: "/assets/img/about/3.webp",
      title: "Corporate",
      subTitle: "Corporate",
      path:"/employee-cab-taxi-transport-service"
    },
    {
      src: "/assets/img/about/4.webp",
      title: "Intercity",
      subTitle: "Intercity",
      path:"/intercity-cab-taxi-service"
    },
  ];
  return (
    <section className="about-section three-image about_page animated-section section-b-space">
      <Animation />
      <div className="container">
        <TitleComponent
          title={"Sewak Travels"}
          subTitle={"Outstation Cab Services"}
          span={"Services"}
          titleClass={"title-3"}
        />
        <div className="row">
          <div className={`col-xl-8 ${side === "right" ? "order-xl-1" : ""}`}>
            <div className="image-section">
              {imageData.map((image, index) => (
                
                <div key={index} className="img-box">
                  <img
                    src={image.src}
                    data-tilt
                    data-tilt-perspective="110"
                    data-tilt-speed="400"
                    data-tilt-max="1.2"
                    className="img-fluid"
                    alt=""
                  />
                  <div className="title-box">
                  <Link to={image.path}>
                    <h3>{image.title}</h3>
                    </Link>
                  </div>
                </div>
                
              ))}
            </div>
          </div>
          <div className="col-xl-4">
            <div className="about-text">
              <div>
              <h1 className="service-h1">Solution for Outstation Cab & Taxi service in Delhi/Gurugram </h1>
                    <p>
                    Embark on a journey of comfort, reliability, and convenience with Sewak Travels, your trusted companion for outstation travel. Whether you're planning a weekend getaway, a business trip, or a family vacation, our comprehensive range of outstation cab services caters to all your travel needs. From outstation cab booking to experienced driver for outstation and top-notch taxi service in Delhi for outstation, Sewak Travels ensures a seamless and memorable journey every time.
                    </p>
                {/* <img
                  src="/assets/images/mix/signature.png"
                  className="img-fluid"
                  alt=""
                /> */}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default OutstationContent;
