import { Link } from "react-router-dom";
import Animation from "../Common/Animation";
import TitleComponent from "../Common/TitleComponent";

const AboutUsContent = ({ side }) => {
    const imageData = [
        { src: "/assets/img/about/1.webp", title: "OutStation", subTitle: "water fall" },
        { src: "/assets/img/about/2.webp", title: "Airport", subTitle: "paragliding" },
        { src: "/assets/img/about/3.webp", title: "Corporate", subTitle: "River Front" },
      ];
    return (
      <section className="about-section three-image about_page animated-section section-b-space">
        <Animation />
        <div className="container">
        <TitleComponent title={"Sewak Travels"} subTitle={"About us"} span={"About us"} titleClass={"title-3"} />
          <div className="row">
            <div className={`col-xl-7 ${side === "right" ? "order-xl-1" : ""}`}>
              <div className="image-section">
                {imageData.map((image, index) => (
                  <div key={index} className="img-box">
                    <img src={image.src} data-tilt data-tilt-perspective="110" data-tilt-speed="400" data-tilt-max="1.2" className="img-fluid" alt="" />
                    <div className="title-box">
                      <h3>{image.title}</h3>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            <div className="col-xl-5">
              <div className="about-text">
                <div>
                  <div className="title-3">
                    <span className="title-label">Introduction</span>
                  </div>
                  <h5>
                    <span>Multipurpose Booking Site</span>
                  </h5>
                  <h2>Welcome to Sewaktravels.com</h2>
                  <p>Sewak Travels is an Integrated Travel Company aimed at catering to all aspects of travel with its extensive network at the most economical price.</p>
                  {/* <img src="/assets/images/mix/signature.png" className="img-fluid" alt="" /> */}
                  <div className="buttons-about">
                    <Link to="/#" className="btn btn-lower btn-curve">
                      book now
                    </Link>
                    <Link to={"/contact"} className="btn btn-lower black-btn btn-curve">
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
  
  export default AboutUsContent;
  