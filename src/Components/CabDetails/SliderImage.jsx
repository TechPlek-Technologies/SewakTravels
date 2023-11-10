import { Gallery, Item } from "react-photoswipe-gallery";
import Img from "../Common/Img";
import Slider from "react-slick";
import { useEffect } from "react";
import { useState } from "react";

function SliderImage({ imageSectionData, classSlide })  {
    const [display, setDisplay] = useState(true);
    useEffect(() => {
      setDisplay(false);
      setTimeout(() => setDisplay(true), 500);
    }, [imageSectionData]);
    if (!display) {
      return <div style={{ height: "60vh" }}></div>;
    }
  

   const propertySlider = {
      dots: true,
      infinite: true,
      speed: 500,
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: true,
    };
    return (
      <>
        <Gallery>
          <Slider {...propertySlider} className={`${classSlide}`}>
            {imageSectionData.map((data,i) => (
              <Item original={data.img} width="1200" height="800" key={i}>
                {({ ref, open }) => (
                  <div key={data.id} onClick={open} ref={ref}>
                    <Img src={data.img} className="img-fluid bg-img w-100" alt="" />
                    <h6 className="view-all">{data.title}</h6>
                  </div>
                )}
              </Item>
            ))}
          </Slider>
        </Gallery>
      </>
    );
  };
  
  export default SliderImage;