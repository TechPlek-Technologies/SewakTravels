import Slider from "react-slick";
import Img from "./Img";
import Rating from "../Cab/Home/Testimonials/Rating";

const TopSlider= ({ sliderData, titleClass }) => {
    const slide4 = {
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            },
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
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
    <section className={titleClass}>
      <Slider {...slide4} className="category-4 no-arrow">
        {sliderData.map((data,index) => (
          <div key={index}>
            <div className="top_box">
              <div className="img-part">
                <a href="#">
                  <Img src={data.img} className="img-fluid" alt="" />
                </a>
              </div>
              <div className="right-content">
                <div>
                  <h5>
                    {data.title} <i className="fas fa-heart"></i>
                  </h5>
                  <Rating   />
                  <p>{data.desc}</p>
                  <h6>
                    <del>
                      {" ₹"}
                      {(data.price).toFixed(0)}
                    </del>
                    {" ₹"}
                    {(data.disc).toFixed(0)}
                  </h6>
                </div>
              </div>
              <div className="new-label">
                <span>{"New"}</span>
              </div>
            </div>
          </div>
        ))}
      </Slider>
    </section>
  );
};

export default TopSlider;
