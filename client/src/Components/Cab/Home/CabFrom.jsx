import "./CabFrom.css";
import CabFrom1 from "./CabFrom1";
const CabFrom = ({ type }) => {
  const data = [
    {
      id: 1,
      title: "Cabs From Delhi To",
      imgSrc: "/assets/img/offers/Delhi.webp",
      links: [
        {
          name: "Agra",
          src: "/cab/delhi-to-agra-cabs",
        },
        {
          name: "Jaipur",
          src: "/cab/delhi-to-jaipur-cabs",
        },
        {
          name: "Dehradun",
          src: "/cab/delhi-to-dehradun-cabs",
        },
        {
          name: "Haridwar",
          src: "/cab/delhi-to-haridwar-cabs",
        },
        {
          name: "Chandigarh",
          src: "/cab/delhi-to-chandigarh-cabs",
        },
      ],
    },
    {
      id: 2,
      title: "Cabs From Agra To",
      imgSrc: "/assets/img/offers/agra.webp",
      links: [
        {
          name: "New Delhi",
          src: "/",
        },
        {
          name: "Gurgaon",
          src: "/",
        },
        {
          name: "Noida",
          src: "/",
        },
        {
          name: "Faridabad",
          src: "/",
        },
        {
          name: "Ghaziabad",
          src: "/",
        },
      ],
    },
    {
      id: 3,
      title: "Cabs From Jaipur To",
      imgSrc: "/assets/img/offers/jaipur.webp",
      links: [
        {
          name: "New Delhi",
          src: "/",
        },
        {
          name: "Gurgaon",
          src: "/",
        },
        {
          name: "Noida",
          src: "/",
        },
        {
          name: "Faridabad",
          src: "/",
        },
        {
          name: "Ghaziabad",
          src: "/",
        },
      ],
    },
    {
      id: 4,
      title: "Cabs From Pune To",
      imgSrc: "/assets/img/offers/Pune.webp",
      links: [
        {
          name: "Mumbai",
          src: "/",
        },
        {
          name: "Shirdi",
          src: "/",
        },
        {
          name: "Mahabaleshwar",
          src: "/",
        },
        {
          name: "Nasik",
          src: "/",
        },
        {
          name: "Aurangabad",
          src: "/",
        },
      ],
    },
    {
      id: 5,
      title: "Cabs From Mumbai To",
      imgSrc: "/assets/img/offers/Mumbai .webp",
      links: [
        {
          name: "Pune",
          src: "/",
        },
        {
          name: "Nasik",
          src: "/",
        },
        {
          name: "Shirdi",
          src: "/",
        },
        {
          name: "Lonavala",
          src: "/",
        },
        {
          name: "Mahabaleshwar",
          src: "/",
        },
      ],
    },
    {
      id: 6,
      title: "Cabs From Chandigarh To",
      imgSrc: "/assets/img/offers/chandigarh.webp",
      links: [
        {
          name: "New Delhi",
          src: "/",
        },
        {
          name: "Shimla",
          src: "/",
        },
        {
          name: "Manali",
          src: "/",
        },
        {
          name: "Gurgaon",
          src: "/",
        },
        {
          name: "Noida",
          src: "/",
        },
      ],
    },
    {
      id: 7,
      title: "Cabs From Bangalore To",
      imgSrc: "/assets/img/offers/Banglore.webp",
      links: [
        {
          name: "Ooty",
          src: "/",
        },
        {
          name: "Madikeri",
          src: "/",
        },
        {
          name: "Coorg",
          src: "/",
        },
        {
          name: "Vellore",
          src: "/",
        },
      ],
    },
    {
      id: 8,
      title: "Cabs From Chennai To",
      imgSrc: "/assets/img/offers/Chennai.webp",
      links: [
        {
          name: "Vellore",
          src: "/",
        },
        {
          name: "Pondicherry",
          src: "/",
        },
        {
          name: "Bangalore",
          src: "/",
        },
        {
          name: "Tirupati",
          src: "/",
        },
      ],
    },
    {
      id: 9,
      title: "Cabs From Dehradun To",
      imgSrc: "/assets/img/offers/dehradun.webp",
      links: [
        {
          name: "Mussoorie",
          src: "/",
        },
        {
          name: "New Delhi",
          src: "/",
        },
        {
          name: "Gurgaon",
          src: "/",
        },
        {
          name: "Noida",
          src: "/",
        },
        {
          name: "Faridabad",
          src: "/",
        },
      ],
    },
  ];
  return (
    <section>
      <div class="menu-section ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="menu-box">
                <div class="bottom-bar">
                  <div class="cab-menu">
                    {data?.map((item) => {
                      return <CabFrom1 key={item?.id} item={item} />;
                    })}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default CabFrom;
