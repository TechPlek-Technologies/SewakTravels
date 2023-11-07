import { Link } from "react-router-dom";
import Animation from "../Common/Animation";
import TitleComponent from "../Common/TitleComponent";

const AboutUsContent = ({ side }) => {
    const imageData = [
        { src: "/assets/images/inner-pages/about/1.jpg", title: "OutStation", subTitle: "water fall" },
        { src: "/assets/images/inner-pages/about/2.jpg", title: "Airport", subTitle: "paragliding" },
        { src: "/assets/images/inner-pages/about/3.jpg", title: "Corporate", subTitle: "River Front" },
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
                      <h6>{image.subTitle}</h6>
                    </div>
                  </div>
                ))}
              </div>
            </div>
            <div className="col-xl-5">
              <div className="about-text">
                <div>
                  <div className="title-3">
                    <span className="title-label">introduction</span>
                  </div>
                  <h5>
                    <span>multipurpose theme</span>
                  </h5>
                  <h2>welcome to rica</h2>
                  <p>Lorem Ipsum is the simply dummy text of the printing is of and type the setting the industry. Lorem Ipsum of is has since the 1500s, Lorem Ipsum has been the.....</p>
                  <img src="/assets/images/mix/signature.png" className="img-fluid" alt="" />
                  <div className="buttons-about">
                    <Link href="/pages/blog-detail/left-sidebar" className="btn btn-lower btn-curve">
                      view more
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
  