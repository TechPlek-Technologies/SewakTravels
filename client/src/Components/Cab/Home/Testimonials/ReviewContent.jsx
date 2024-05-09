import Slider from "react-slick";
import { reviews } from "../../../../Data/Testimonials";

const ReviewContent = () => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 2,
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
            <div class="testimonial-box text-center col-lg-10" key={index}>
              <div class="testimonial-info-wrap">
                <div class="testimonial-quote d-inline-block">
                  <img
                    src="/assets/img/testimonials/quote.svg"
                    alt=""
                    style={{ height: "45px", width: "45px" }}
                  />
                </div>
                <img class="testimonial-author-img" src={reviews.src} alt="" />
                <p>{reviews.description}</p>
                <h3>
                  <strong>{reviews.name}</strong>
                </h3>
              </div>
            </div>
          ))}
        </Slider>
      </div>
    </div>
  );
};

export default ReviewContent;
