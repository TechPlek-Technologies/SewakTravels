import TopSlider from "../../Common/TopSlider";

const TopCategory= ({ titleClass }) => {
    const topCategoryData = [
        {
          id: 1,
          img: "/assets/images/restaurant/cat/1.jpg",
          title: "shrimp lo",
          desc: "Lorem Ipsum is simply dummy",
          price: 240,
          disc: 200,
        },
        {
          id: 2,
          img: "/assets/images/restaurant/cat/2.jpg",
          title: "fast hot",
          desc: "Lorem Ipsum is simply dummy",
          price: 240,
          disc: 200,
        },
        {
          id: 3,
          img: "/assets/images/restaurant/cat/3.jpg",
          title: `ching dan`,
          desc: "Lorem Ipsum is simply dummy",
          price: 240,
          disc: 200,
        },
        {
          id: 4,
          img: "/assets/images/restaurant/cat/4.jpg",
          title: "dali fish",
          desc: "Lorem Ipsum is simply dummy",
          price: 240,
          disc: 200,
        },
        {
          id: 5,
          img: "/assets/images/restaurant/cat/2.jpg",
          title: "shrimp lo",
          desc: "Lorem Ipsum is simply dummy",
          price: 240,
          disc: 200,
        },
      ];
    return <TopSlider titleClass={titleClass} sliderData={topCategoryData} />;
  };
  
  export default TopCategory;