import Slider from "react-slick";
import Img from "./Img";
import { Link } from "react-router-dom";
import Rating from "../Cab/Home/Testimonials/Rating";

const SliderSix= ({ slideData }) => {
     const slide3 = {
      adaptiveHeight: true,
      // centerMode: true,
      infinite: true,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: false,
      autoplaySpeed: 5000,
      // centerMode: false,
      responsive: [
          {
              breakpoint: 1200,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 768,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
              }
          }
      ]
    };
    return (
      <Slider {...slide3} className="slide-3 no-arrow">
        {slideData?.map((data,index) => (
          <div key={index}>
            <div className="menu-box">
              <div className="top-bar">
                <Img src={data.titleImg} className="img-fluid" alt="" width={440} height={120} />
                <h2>{data.place}</h2>
                <div className="decorate">{data.place}</div>
              </div>
              <div className="bottom-bar">
                {data.package.map((subData, i) => (
                  <div className="menu-bar" key={i}>
                    
                    <div className="content">
                      <Link href="/pages/other-pages/about-us-2">
                        <h5>{subData.title}</h5>
                      </Link>
                      <Rating rang="4.8" />
                      <p>{subData.city}</p>
                      <h6>
                        <del>
                          {"₹"}
                          {( subData.price).toFixed(0)}
                        </del>{" "}
                        {"₹"}
                        {( subData.disc).toFixed(0)}
                        {subData.label === "famous" ? <label>famous</label> : <label className="red">-25%</label>}
                      </h6>
                    </div>
                  </div>
                ))}
              </div>
            </div>
          </div>
        ))}
      </Slider>
    );
  };
  
  export default SliderSix;