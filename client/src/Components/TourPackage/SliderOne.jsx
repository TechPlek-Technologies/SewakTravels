import Slider from "react-slick";
import Img from "../Common/Img";

const SliderOne = ({ tourData, classTitle, slideClass }) => {
  const slide4 = {
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
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
        <Slider {...slide4} className={slideClass}>
          {tourData.map((data,index) => (
            <div key={index}>
              <div className={classTitle}>
                <div className="tourImg bg-size">
                  <Img src={data.img} className="img-fluid  bg-img" alt="" />
                </div>
                <div className="tourContent">
                  <h3>{data.title}</h3>
                  <h6>
                    starting from {"₹"}
                    {( 5000).toFixed(0)}
                  </h6>
                </div>
              </div>
            </div>
          ))}
        </Slider>
    );
  };
  
  export default SliderOne;
  