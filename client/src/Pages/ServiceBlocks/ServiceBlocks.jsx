import "./ServiceBlocks.css";
import ServiceBlocks1 from "./ServiceBlocks1";
const ServiceBlocks = ({ type }) => {
  const data = [
    {
      id: 1,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
    {
      id: 2,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
    {
      id: 3,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        }, {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
    {
      id: 4,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
    {
      id: 5,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
    {
      id: 6,
      title: "Other Taxi Services near Agra",
      links: [
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
        {
          name: "Taxi service in Shamshabad",
          src: "",
        },
      ],
    },
  ];
  return (
    <section id='top-cab-routes' className='bg-inner menu-margin'>
      <div class="menu-section ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="bottom-bar">
                <div class="cab-menu1">
                  {data?.map((item) => {
                    return <ServiceBlocks1 key={item?.id} item={item} />;
                  })}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default ServiceBlocks;
