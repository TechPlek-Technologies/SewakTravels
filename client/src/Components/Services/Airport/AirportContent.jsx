import { Link } from "react-router-dom";
import Animation from "../../Common/Animation";
import TitleComponent from "../../Common/TitleComponent";

const AirportContent = ({ side }) => {
    const imageData = [
        {
            src: "/assets/img/about/1.webp",
            title: "OutStation",
            subTitle: "water fall",
            path:"/outstation-cab-taxi-service"
          },
          {
            src: "/assets/img/about/2.webp",
            title: "Airport",
            subTitle: "paragliding",
            path:"/airport-cab-taxi-transport-service"
          },
          {
            src: "/assets/img/about/3.webp",
            title: "Corporate",
            subTitle: "River Front",
            path:"/employee-cab-taxi-transport-service"
          },
      ];
      return (
        <section className="about-section three-image about_page animated-section section-b-space">
          <Animation />
          <div className="container">
            <TitleComponent
              title={"Sewak Travels"}
              subTitle={"Services"}
              span={"Services"}
              titleClass={"title-3"}
            />
            <div className="row">
              <div className={`col-xl-7 ${side === "right" ? "order-xl-1" : ""}`}>
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
              <div className="col-xl-5">
                <div className="about-text">
                  <div>
                    <h2> airport Services</h2>
                    <p>
                      Lorem Ipsum is the simply dummy text of the printing is of and
                      type the setting the industry. Lorem Ipsum of is has since the
                      1500s, Lorem Ipsum has been the.....
                    </p>
                    <img
                      src="/assets/images/mix/signature.png"
                      className="img-fluid"
                      alt=""
                    />
                    <div className="buttons-about">
                      <Link to="/cab/listing" className="btn btn-lower btn-curve">
                        Book Now
                      </Link>
                      <Link
                        to={"/contact"}
                        className="btn btn-lower black-btn btn-curve"
                      >
                        contact us
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      );
  };
  
  export default AirportContent;
  