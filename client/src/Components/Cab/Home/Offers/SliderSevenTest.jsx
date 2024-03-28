import Slider from "react-slick";
import { Link } from "react-router-dom";
import useSearchBetweenPlaces from "../../../../Utility/SearchFromPlace";
export const SliderSevenTest =({ type,slideData })=> {
  
  const slide4 = {
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
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
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
      {
        breakpoint: 480, // New breakpoint added
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      }
    ],
  };
      
  const searchBetweenPlaces = useSearchBetweenPlaces();

  return (
    <Slider {...slide4} className="slider-4 arrow-classic">
        {slideData.map((data, index) => (
        <div key={index}>
      <div className="parentbigslide">
      <div className="bigslideDiv">
      {/* <div className="label-offer">Coupon code: {data.couponCode}</div> */}
        <div>
          <img src={data.img} alt=""/>
          
        </div>
        <div className="spacing">
          {/* <h3>GENERAL </h3> */}
          <h2>{data.title}</h2>
          {/* <div className="reddiv"></div> */}
          <p>{data.desc}</p>
          <div className="new-line-container">
                    <Link
                      className={`btn1 btn-rounded1 color1 packageButton`}
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
      <div className="CouponFt">
             <span>T&C'sApply</span>
             {/* <span className="coupon">Coupon code: {data.couponCode}</span> */}
        </div>
      </div>
      </div>
      ))}
        </Slider>
  );
};

export default SliderSevenTest;