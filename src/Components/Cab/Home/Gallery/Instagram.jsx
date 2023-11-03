import InstaSlider from "./InstaSlider";

const Instagram= () => {
  const instagram = [
    {
      id: 1,
      src: "/assets/images/instagram/7.jpg",
    },
    {
      id: 2,
      src: "/assets/images/instagram/8.jpg",
    },
    {
      id: 3,
      src: "/assets/images/instagram/9.jpg",
    },
    {
      id: 4,
      src: "/assets/images/instagram/10.jpg",
    },
    {
      id: 5,
      src: "/assets/images/instagram/11.jpg",
    },
    {
      id: 6,
      src: "/assets/images/instagram/12.jpg",
    },
    {
      id: 7,
      src: "/assets/images/instagram/9.jpg",
    },
  ];
    return (
      <section className="pt-0">
        <div className="ratio_square instgram-slider container-fluid">
          <div className="row">
            <div className="col p-0">
              <InstaSlider instagramData={instagram} />
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default Instagram;