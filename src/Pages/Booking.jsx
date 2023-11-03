import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { carData } from "../Data/CabData";

const Booking = () => {
  // const targetId = param.id;
  const desiredcar = carData.find((car) => car.id === 1);

  console.log(desiredcar?.id);
  // const includeInPrice = [
  //   "cancellation",
  //   "theft protection",
  //   "local taxes",
  //   "Prices are inclusive of all the taxes",
  //   "fuel charges",
  //   "driver allowance",
  // ];

  // const excludeInPrice = [
  //   "late return charges",
  //   "Night Allowance",
  //   "Parking",
  //   "toll / state tax",
  // ];
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
