import Slider from "react-slick";
import { reviews } from "../../../../Data/Testimonials";

const ReviewContentTest = () => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    row: 1,
    slidesToScroll: 1,
    autoplay: false,
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
            <div class="slide-3 no-arrow" key={index}>
              <div>
                <div class="blog-wrap" style={{backgroundColor:"#fff",height:"480px"}}>
                  <div class="blog-image">
                    <div className="testimonial-img">
                      <img
                        src={reviews.src}
                        class="img-fluid lazyload bg-img"
                        alt=""
                        style={{ height: "150px", width: "150px",borderRadius: "10px"}}
                      />
                    </div>
                  </div>
                  <div class="destination-details">
                    <div>
                      <h2>{reviews.name}</h2>
                      <h6>{reviews.description}</h6>
                    </div>
                  </div>
                  <div class="detail">
                    <div class="rating testimonial-rating">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="far fa-star"></i>
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
