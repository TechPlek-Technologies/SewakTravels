import { Link } from "react-router-dom";
import Animation from "../Common/Animation";
import TitleComponent from "../Common/TitleComponent";

const AboutUsContent = ({ side }) => {
    
    return (
      <section className="about-section three-image about_page animated-section section-b-space">
        <Animation />
        <div className="container">
        <TitleComponent title={"Sewak Travels"} subTitle={"About us"} span={"About us"} titleClass={"title-3"} />
          <div className="row">
            <div className="col-xl-12">
              <div className="about-text">
                <div>
                  <h1 className="service-h1">Innovative Online Cab Booking and Travel Agency</h1>
                  
                  <p>Sewak Travels elevates your travel experience through exceptional car transport services, dedicated to ensuring your utmost satisfaction. As your trusted car rental agency, we redefine cab experiences with a blend of convenience, comfort, and reliability. At Sewak, we offer a comprehensive range of online cab booking services tailored to meet your diverse travel needs. From seamless NCR taxi services, and intercity cab services to reliable airport taxi service, and from employee transport services to hassle-free outstation cab booking, we're here for you. Whether you're commuting for work or embarking on a leisurely getaway, our best-in-class transportation services ensure a comfortable and stress-free journey every time. Experience the convenience and reliability of Sewak Travels today!</p>
                  {/* <img src="/assets/images/mix/signature.png" className="img-fluid" alt="" /> */}
                  <h2 className="service-h2">Book with the Best Car Travel Agency in Gurgaon </h2>
                  <p>Planning your next adventure or corporate trip? Look no further than Sewak Travels. As a reputable Car travel agency, we prioritize delivering seamless cab experiences tailored to your needs. Our commitment to safety is paramount. Rest assured that every driver in our team is experienced and well-trained, possessing the expertise to navigate diverse terrains with ease. </p>

                  <p>Whether you're exploring bustling city streets or venturing into the serene countryside, our drivers ensure a secure and enjoyable journey every step of the way. Book a ride NOW!</p>

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
  