import Slider from "react-slick";
import { reviews } from "../../../../Data/Testimonials";

const ReviewContentTest = () => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    row: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 586,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };
  return (
    <div className="slide-1">
      <div>
        <Slider {...slide2} className="slide-2 arrow-classic">
          {reviews.map((reviews, index) => (
            <div className="slide-3 no-arrow" key={index}>
              <div>
                <div className="blog-wrap" style={{backgroundColor:"#fff",height:"480px"}}>
                  <div className="blog-image">
                    <div className="testimonial-img">
                      <img
                        src={reviews.src}
                        className="img-fluid lazyload bg-img"
                        alt=""
                        style={{ height: "150px", width: "150px",borderRadius: "10px"}}
                      />
                    </div>
                  </div>
                  <div className="destination-details">
                    <div>
                      <h2>{reviews.name}</h2>
                      <h6>{reviews.description}</h6>
                    </div>
                  </div>
                  <div className="detail">
                    <div className="rating testimonial-rating">
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="fas fa-star"></i>
                      <i className="far fa-star"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </Slider>
      </div>
    </div>
  );
};

export default ReviewContentTest;
