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
          src: "/cab/agra-to-delhi-cabs",
        },
        {
          name: "Gurgaon",
          src: "/cab/agra-to-gurgaon-cabs",
        },
        {
          name: "Noida",
          src: "/cab/agra-to-noida-cabs",
        },
        {
          name: "Faridabad",
          src: "/cab/agra-to-faridabad-cabs",
        },
        {
          name: "Ghaziabad",
          src: "/cab/agra-to-ghaziabad-cabs",
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
          src: "/cab/jaipur-to-delhi-cabs",
        },
        {
          name: "Gurgaon",
          src: "/cab/jaipur-to-gurgaon-cabs",
        },
        {
          name: "Noida",
          src: "/cab/jaipur-to-noida-cabs",
        },
        {
          name: "Faridabad",
          src: "/cab/jaipur-to-faridabad-cabs",
        },
        {
          name: "Ghaziabad",
          src: "/cab/jaipur-to-ghaziabad-cabs",
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
          src: "/cab/pune-to-mumbai-cabs",
        },
        {
          name: "Shirdi",
          src: "/cab/pune-to-shirdi-cabs",
        },
        {
          name: "Mahabaleshwar",
          src: "/cab/pune-to-mahabaleshwar-cabs",
        },
        {
          name: "Nasik",
          src: "/cab/pune-to-nasik-cabs",
        },
        {
          name: "Aurangabad",
          src: "/cab/pune-to-aurangabad-cabs",
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
          src: "/cab/mumbai-to-pune-cabs",
        },
        {
          name: "Nasik",
          src: "/cab/mumbai-to-nasik-cabs",
        },
        {
          name: "Shirdi",
          src: "/cab/mumbai-to-shirdi-cabs",
        },
        {
          name: "Lonavala",
          src: "/cab/mumbai-to-lonavala-cabs",
        },
        {
          name: "Mahabaleshwar",
          src: "/cab/mumbai-to-mahabaleshwar-cabs",
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
          src: "/cab/chandigarh-to-delhi-cabs",
        },
        {
          name: "Shimla",
          src: "/cab/chandigarh-to-shimla-cabs",
        },
        {
          name: "Manali",
          src: "/cab/chandigarh-to-manali-cabs",
        },
        {
          name: "Gurgaon",
          src: "/cab/chandigarh-to-gurgaon-cabs",
        },
        {
          name: "Noida",
          src: "/cab/chandigarh-to-noida-cabs",
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
          src: "/cab/bangalore-to-ooty-cabs",
        },
        {
          name: "Madikeri",
          src: "/cab/bangalore-to-madikeri-cabs",
        },
        {
          name: "Coorg",
          src: "/cab/bangalore-to-coorg-cabs",
        },
        {
          name: "Vellore",
          src: "/cab/bangalore-to-vellore-cabs",
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
          src: "/cab/chennai-to-vellore-cabs",
        },
        {
          name: "Pondicherry",
          src: "/cab/chennai-to-pondicherry-cabs",
        },
        {
          name: "Bangalore",
          src: "/cab/chennai-to-bangalore-cabs",
        },
        {
          name: "Tirupati",
          src: "/cab/chennai-to-tirupati-cabs",
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
          src: "/cab/dehradun-to-mussoorie-cabs",
        },
        {
          name: "New Delhi",
          src: "/cab/dehradun-to-delhi-cabs",
        },
        {
          name: "Gurgaon",
          src: "/cab/dehradun-to-gurgaon-cabs",
        },
        {
          name: "Noida",
          src: "/cab/dehradun-to-noida-cabs",
        },
        {
          name: "Faridabad",
          src: "/cab/dehradun-to-faridabad-cabs",
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
