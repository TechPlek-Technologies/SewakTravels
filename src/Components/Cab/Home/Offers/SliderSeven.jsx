import Slider from "react-slick";
import Img from "../../../Common/Img";
import { Link } from "react-router-dom";
import Rating from "../Testimonials/Rating";
import useSearchBetweenPlaces from "../../../../Utility/SearchFromPlace";

const SliderSeven = ({ type,slideData }) => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 3,
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

               onClick={() => {
                searchBetweenPlaces(data.source, data.destination);
              }}
                to={`/cab/listing/${encodeURIComponent(
                  data.source
                )}/${encodeURIComponent(data.destination)}`}
               
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
                    onClick={() => {
                      searchBetweenPlaces(data.source, data.destination);
                    }}
                  >
                    <h3>{data.title}</h3>
                  </Link>
                </div>
                <Rating />
                <div className="bottom">
                  

                  <div className="new-line-container">
                    <Link
                      className={`btn btn-rounded color1 packageButton`}
                      to={`/cab/listing/${encodeURIComponent(
                        data.source
                      )}/${encodeURIComponent(data.destination)}`}
                      onClick={() => {
                        searchBetweenPlaces(data.source, data.destination);
                      }}
                    >
                      {"Book Now"}
                    </Link>
                  </div>
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
