import Slider from "react-slick";
import { reviews } from "../../../../Data/Testimonials";
import Img from "../../../Common/Img";
import Rating from "./Rating";

const ReviewContent = () => {
    const slide1 = {
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
      };
    return (
      <div className="slide-1">
        <Slider {...slide1}>
          {reviews.map((review,index) => (
            <div key={index}>
              <div className="row">
                <div className="col-xl-8 offset-xl-2">
                  <div className="testimonial">
                    <div className="left-part">
                      <Img src={review.src} className="img-fluid" alt="" />
                      <div className="design">
                        <i className="fas fa-comments"></i>
                        <i className="fas fa-comments light"></i>
                      </div>
                    </div>
                    <div className="right-part">
                      <p> {review.description}</p>
                      <div className="detail">
                        <Rating />
                        <h6>{review.name}</h6>
                      </div>
                    </div>
                    <div className="quote-icon">
                      <i className="fas fa-quote-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>
    );
  };
  
  export default ReviewContent;