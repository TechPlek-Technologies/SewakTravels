import { useRef, useState } from "react";
import "./CabSearch2.css";
import DirectionsCarFilledOutlinedIcon from "@mui/icons-material/DirectionsCarFilledOutlined";
import AirplanemodeActiveOutlinedIcon from "@mui/icons-material/AirplanemodeActiveOutlined";
import AccessTimeOutlinedIcon from "@mui/icons-material/AccessTimeOutlined";
import RouteOutlinedIcon from "@mui/icons-material/RouteOutlined";
import DatePickerComponent from "../../../Common/DatePickerComponent";
import TimePickerComponent from "../../../Common/TimePickerComponent";
import DateRangeOutlinedIcon from "@mui/icons-material/DateRangeOutlined";
import useAutocomplete from "../../../../Utility/Autocomplete";
import useAutocompleteFlight from "../../../../Utility/AutoCompleteFlight";
import OutstationDataState from "../../../../Hooks/OutstationDataState";

function CabSearch2({
  source,
  destination,
  setSource,
  setDestination,
  selectedValue,
  setSelectedValue,
  startDate,
  setStartDate,
  returnDate,
  setReturnDate,
  setStartTime,
  setReturnTime,
  setRentals,
  handlePopupClose,
}) {
  const [selectedCabOption, setSelectedCabOption] = useState("outstationCabs");

  const [selectedTripType, setSelectedTripType] = useState("oneWay");

  const [airportTravel, setAirportTravel] = useState("travelToAirport");

  const sourceFlightRef = useRef(null);
  const sourceInputRef = useRef(null);
  const destinationInputRef = useRef(null);

  useAutocomplete(sourceInputRef, setSource);
  useAutocompleteFlight(sourceFlightRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);

  return (
    <div id="cab-search-2">
      
        <div >
          <h1 className="title-top animation-bg" style={{letterSpacing:"0.21em",backgroundColor:"black",color:"#fff"}}>ONLINE CAB BOOKING</h1>
        </div>
     
      <div></div>
      <div className="container1">
        <div className="container-box">
          <div
            onClick={() => {
              setSelectedCabOption("outstationCabs");
            }}
            className={`cabOptionCard ${
              selectedCabOption === "outstationCabs" && "active-cab-option-bg"
            }`}
          >
            <div className="text-center">
              <DirectionsCarFilledOutlinedIcon
                style={{
                  color: selectedCabOption === "outstationCabs" && "white",
                }}
              />
            </div>
            <div
              className={
                selectedCabOption === "outstationCabs" &&
                "active-cab-option-txt-color"
              }
            >
              Outstation
            </div>
            <div
              className={
                selectedCabOption === "outstationCabs" &&
                "active-cab-option-txt-color"
              }
            >
              Cabs
            </div>
          </div>

          <div className="forVerticalLine"></div>

          <div
            onClick={() => {
              setSelectedCabOption("airportCabs");
            }}
            className={`cabOptionCard ${
              selectedCabOption === "airportCabs" && "active-cab-option-bg"
            }`}
          >
            <div className="text-center">
              <AirplanemodeActiveOutlinedIcon
                style={{
                  color: selectedCabOption === "airportCabs" && "white",
                }}
              />
            </div>
            <div
              className={
                selectedCabOption === "airportCabs" &&
                "active-cab-option-txt-color"
              }
            >
              Airport
            </div>
            <div
              className={
                selectedCabOption === "airportCabs" &&
                "active-cab-option-txt-color"
              }
            >
              Cabs
            </div>
          </div>

          <div className="forVerticalLine"></div>

          <div
            onClick={() => {
              setSelectedCabOption("hourlyRentals");
            }}
            className={`cabOptionCard ${
              selectedCabOption === "hourlyRentals" && "active-cab-option-bg"
            }`}
          >
            <div className="text-center">
              <AccessTimeOutlinedIcon
                style={{
                  color: selectedCabOption === "hourlyRentals" && "white",
                }}
              />
            </div>
            <div
              className={
                selectedCabOption === "hourlyRentals" &&
                "active-cab-option-txt-color"
              }
            >
              Hourly
            </div>
            <div
              className={
                selectedCabOption === "hourlyRentals" &&
                "active-cab-option-txt-color"
              }
            >
              Rentals
            </div>
          </div>
        </div>
      </div>

      <div>
        {selectedCabOption !== "hourlyRentals" ? (
          <div>
            <div>
              <RouteOutlinedIcon
                className="mr-3"
                sx={{ transform: "rotate(90deg)" }}
              />

              {selectedCabOption === "airportCabs" && (
                <div
                  className={
                    airportTravel === "travelToAirport" &&
                    "active-trip-type-border"
                  }
                  onClick={() => {
                    setAirportTravel("travelToAirport");
                  }}
                >
                  <span className="outerSpan">
                    {airportTravel === "travelToAirport" && (
                      <span className="innerSpan"></span>
                    )}
                  </span>
                  <div
                    className={
                      airportTravel === "travelToAirport" &&
                      "active-trip-type-txt-color"
                    }
                  >
                    Travel to Airport
                  </div>
                </div>
              )}

              {selectedCabOption === "airportCabs" && (
                <div
                  className={
                    airportTravel === "travelFromAirport" &&
                    "active-trip-type-border"
                  }
                  onClick={() => {
                    setAirportTravel("travelFromAirport");
                  }}
                >
                  <span className="outerSpan">
                    {airportTravel === "travelFromAirport" && (
                      <span className="innerSpan"></span>
                    )}
                  </span>
                  <div
                    className={
                      airportTravel === "travelFromAirport" &&
                      "active-trip-type-txt-color"
                    }
                  >
                    Travel from Airport
                  </div>
                </div>
              )}

              {selectedCabOption === "outstationCabs" && (
                <div
                  className={
                    selectedTripType === "oneWay" && "active-trip-type-border"
                  }
                  onClick={() => {
                    setSelectedTripType("oneWay");
                  }}
                >
                  <span className="outerSpan">
                    {selectedTripType === "oneWay" && (
                      <span className="innerSpan"></span>
                    )}
                  </span>
                  <div
                    className={
                      selectedTripType === "oneWay" &&
                      "active-trip-type-txt-color"
                    }
                  >
                    One Way
                  </div>
                </div>
              )}

              {selectedCabOption === "outstationCabs" && (
                <div
                  className={
                    selectedTripType === "roundTrip" &&
                    "active-trip-type-border"
                  }
                  onClick={() => {
                    setSelectedTripType("roundTrip");
                  }}
                >
                  <span className="outerSpan">
                    {selectedTripType === "roundTrip" && (
                      <span className="innerSpan"></span>
                    )}
                  </span>
                  <div
                    className={
                      selectedTripType === "roundTrip" &&
                      "active-trip-type-txt-color"
                    }
                  >
                    Round Trip
                  </div>
                </div>
              )}
            </div>
          </div>
        ) : (
          <main />
        )}

        <div>
          <img src="/assets/icons/source.png" alt="" />
          {selectedCabOption === "airportCabs" && airportTravel === "travelFromAirport" ? (
            <input
              type="text"
              ref={sourceFlightRef}
              placeholder="Airport Name"
            />
          ) : (
            <input
              type="text"
              ref={sourceInputRef}
              placeholder="Pick Up Address"
            />
          )}
        </div>

        {selectedCabOption !== "hourlyRentals" ? (
          <div>
            <img src="/assets/icons/destination.png" alt="" />
            {selectedCabOption === "airportCabs" && airportTravel === "travelToAirport" ? (
              <input
                type="text"
                ref={sourceFlightRef}
                placeholder="Airport Name"
              />
            ) : (
              <input
                type="text"
                ref={destinationInputRef}
                placeholder="Drop Address"
              />
            )}
          </div>
        ) : (
          <main />
        )}

        <div>
          <div>
            <DateRangeOutlinedIcon className="mr-3" />
            <div>
              <h4>Pick up Date</h4>
              <DatePickerComponent
                startDate={startDate}
                setStartDate={setStartDate}
              />
            </div>
          </div>
          <div>
            <AccessTimeOutlinedIcon className="mr-3" />
            <div>
              <h4>Pick up Time</h4>
              <TimePickerComponent updateTimeCallback={setStartTime} />
            </div>
          </div>
        </div>

        {selectedTripType === "roundTrip" &&
        selectedCabOption === "outstationCabs" ? (
          <div>
            <div>
              <DateRangeOutlinedIcon className="mr-3" />
              <div>
                <h4>Return Date</h4>
                <DatePickerComponent
                  startDate={returnDate}
                  setStartDate={setReturnDate}
                />
              </div>
            </div>
            <div>
              <AccessTimeOutlinedIcon className="mr-3" />
              <div>
                <h4>Drop Time</h4>
                <TimePickerComponent updateTimeCallback={setReturnTime} />
              </div>
            </div>
          </div>
        ) : (
          <main />
        )}

        {selectedCabOption === "hourlyRentals" && (
          <div>
            <AccessTimeOutlinedIcon className="mr-3" />
            <div>
              <h4>Select Package</h4>
              <select
                onChange={(e) => {
                  setRentals(e.target.value);
                }}
              >
                <option value="4hrs40km" selected>
                  4hrs 40kms
                </option>
                <option value="8hrs80km">8hrs 80kms</option>
              </select>
            </div>
          </div>
        )}
        <button onClick={handlePopupClose}>Search Cabs</button>
      </div>
    </div>
  );
}

export default CabSearch2;
