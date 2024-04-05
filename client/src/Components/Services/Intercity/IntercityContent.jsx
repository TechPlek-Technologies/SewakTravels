import { Link } from "react-router-dom";
import Animation from "../../Common/Animation";
import TitleComponent from "../../Common/TitleComponent";

const IntercityContent = ({ side }) => {
  
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
              subTitle={"Intercity Taxi Transport Services"}
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
                    <h1 className="service-h1">Discover Our Intercity Taxi Service for Smooth Journey</h1>
                    <p>
                    At Sewak Travels, we redefine your intercity ride experience with our unparalleled intercity cab services and commitment to your satisfaction. As your premier travel partner, we redefine intercity taxi service experiences with convenience, comfort, and reliability. From online taxi service and intercity cab services to outstation trips, we've got you covered. Explore our comprehensive range of intercity cab services designed to cater to all your travel needs.
                    </p>
                   
                    {/* <img
                      src="/assets/images/mix/signature.png"
                      className="img-fluid"
                      alt=""
                    /> */}
                    {/* <div className="buttons-about">
                      <Link to="/cab/listing" className="btn btn-lower btn-curve">
                        Book Now
                      </Link>
                      <Link
                        to={"/contact"}
                        className="btn btn-lower black-btn btn-curve"
                      >
                        Contact Us
                      </Link>
                    </div> */}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      );
  };
  
  export default IntercityContent;
  