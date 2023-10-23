import { useState } from "react";

const CabTypeFilter= () => {
    const [show, setShow] = useState(true);
    const dispatch = useDispatch();
    const cabTypeStatus = useSelector((state) => state.cabFilterReducer.cabTypeStatus);
  
    const handleCheckboxChange = (event) => {
      const value = event.target.value;
      const isChecked = event.target.checked;
  
      if (isChecked) {
        dispatch({ type: "cabTypeStatus", payload: [...cabTypeStatus, value] });
      } else {
        dispatch({ type: "cabTypeStatus", payload: cabTypeStatus.filter((selectedValue) => selectedValue !== value) });
      }
    };
  
    useEffect(() => {
      dispatch({ type: "cabTypeStatus", payload: cabTypeStatus });
    }, [cabTypeStatus]);
  
    return (
      <div
        className="filter-block"
        onClick={() => {
          setShow(!show);
        }}>
        <div className={`collection-collapse-block ${show ? "open" : ""}`}>
          <h6 className="collapse-block-title">Cab Type</h6>
          <div className={`collection-collapse-block-content ${!show ? "d-none" : ""} `}>
            <div className="collection-brand-filter">
              {carTypeData.map((data,index) => {
                return (
                  <div className="form-check collection-filter-checkbox" key={index}>
                    <input type="checkbox" className="form-check-input" id={data.type} value={data.type} checked={cabTypeStatus.includes(data.type)} onChange={handleCheckboxChange} />
                    <label className="form-check-label" htmlFor={data.type}>
                      {data.type}
                    </label>
                  </div>
                );
              })}
            </div>
          </div>
        </div>
      </div>
    );
  };
  const MemorizedCabTypeFilter = React.memo(CabTypeFilter);
  export default MemorizedCabTypeFilter;