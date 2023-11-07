import { Link } from "react-router-dom";
import Img from "../../../Common/Img";
import Slider from "react-slick";

const SliderThree=({ slideData }) => {
    
    const slide1 = {
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
      };
      
    return (
      <>
        <Slider {...slide1}>
          {slideData.map((banner,index) => (
            <div key={index}>
              <div className="row">
                <div className="col-lg-7 offset-lg-4 col-md-10 offset-md-1">
                  <div className="ticket-box">
                    <div className="ticket-title">
                      <h6>{banner.responsiveDesc}</h6>
                      <span>
                        <i className={banner.icon}></i>
                      </span>
                    </div>
                    <div className="image-box">
                      <Img src={banner.img} className="img-fluid" alt="" />
                      
                    </div>
                    <div className="content">
                      <div className="detail">
                        <h4>
                          <span>
                            {"₹"}
                            {( banner.price).toFixed(2)}
                          </span>{" "}
                          {banner.per}
                        </h4>
                        <h2>{banner.title}</h2>
                        {banner.shortDescription && (
                          <h6>
                            {banner.shortDescription}{" "}
                            <span>{banner.shortDescriptionSpan}</span>
                          </h6>
                        )}
                        <p>{banner.description}</p>
                        <Link href="/pages/other-pages/contact-us-1" className="btn btn-solid">
                          {banner.btn}
                        </Link>
                      </div>
                      <div className="barcode-design">
                        <Img
                          src={"/assets/images/barcode.png"}
                          className="img-fluid"
                          alt=""
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </>
    );
  };
  
  export default SliderThree;
  