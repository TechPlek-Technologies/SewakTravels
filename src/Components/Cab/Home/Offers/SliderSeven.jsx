import Slider from "react-slick";
import Img from "../../../Common/Img";
import { Link } from "react-router-dom";
import Rating from "../Testimonials/Rating";
import useSearchBetweenPlaces from "../../../../Utility/SearchFromPlace";

const SliderSeven = ({ slideData }) => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 5000,
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
    ],
  };

  const searchBetweenPlaces = useSearchBetweenPlaces();

  return (
    <Slider {...slide2} className="slide-2 arrow-classic">
      {slideData.map((data, index) => (
        <div key={index}>
          <div className="category-wrap">
            <div className="category-img">
              <Link
                to={`/cab/listing/${encodeURIComponent(
                  data.source
                )}/${encodeURIComponent(data.destination)}`}
                onClick={()=>{
                  searchBetweenPlaces(data.source,data.destination)
                }}
              >
                <Img
                  src={data.img}
                  alt=""
                  className="img-fluid  "
                  width={230}
                  height={230}
                  
                />
              </Link>
              <div className="side-effect"></div>
            </div>
            <div className="category-content">
              <div>
                <div className="top">
                  <Link
                    to={`/cab/listing/${encodeURIComponent(
                      data.source
                    )}/${encodeURIComponent(data.destination)}`}
                    onClick={()=>{
                      searchBetweenPlaces(data.source,data.destination)
                    }}
                  >
                    <h3>{data.title}</h3>
                  </Link>
                  <h6>{data.badge}</h6>
                  {data.classIcon && (
                    <div className="like-cls">
                      <i className="fas fa-heart">
                        <span className="effect"></span>
                      </i>
                    </div>
                  )}
                </div>
                <Rating />
                <p>{data.desc}</p>
                <div className="bottom">
                  <h3>
                    <del>
                      {"₹"}
                      {data.price.toFixed(0)}
                    </del>
                    {"₹"}
                    {data.disc.toFixed(0)}
                  </h3>
                  <h6 className="coupon-code">
                    Coupon code: <span>{data.couponCode}</span>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      ))}
    </Slider>
  );
};

export default SliderSeven;
