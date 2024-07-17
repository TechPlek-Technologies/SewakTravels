import "./ServiceBlocks.css";
import ServiceBlocks1 from "./ServiceBlocks1";
const ServiceBlocks = ({ sourceData, destinationData }) => {


  const getRandomEntries = (data, count) => {
    const shuffledArray = data.links.sort(() => Math.random() - 0.5);
    // Return at least 5 items, or max of 20
    return shuffledArray.slice(0, Math.min(Math.max(5, shuffledArray.length), 20));
  };



  return (
    <section id="top-cab-routes" className="bg-inner menu-margin">
      <div class="menu-section ">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="bottom-bar">
                <div class="cab-menu1">
                  {sourceData &&
                    Object.keys(sourceData).map((category) => (
                      <ServiceBlocks1
                        key={sourceData[category].id}
                        item={getRandomEntries(sourceData[category])}
                        title={sourceData[category].title}
                      />
                    ))}
                     {destinationData &&
                    Object.keys(destinationData).map((category) => (
                      <ServiceBlocks1
                        key={destinationData[category].id}
                        item={getRandomEntries(destinationData[category])}
                        title={destinationData[category].title}
                      />
                    ))}
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
