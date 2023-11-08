import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { carData } from "../Data/CabData";

const Booking = () => {
  // const targetId = param.id;
  const desiredcar = carData.find((car) => car.id === 1);


  return (
    <section className="section-b-space bg-inner animated-section">
      <Animation />
      <div className="container">
        <div className="row">
          <TravelInfo />
          <Summary desiredcar={desiredcar} />
        </div>

       
      </div>
    </section>
  );
};

export default Booking;
