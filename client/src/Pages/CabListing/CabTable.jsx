import React from "react";
import CabTableInner from "./CabTableInner";

const CabTable = () => {
  return (
    <div>
      <div className="table-responsive">
        <table className="table">
          <thead>
            <tr style={{ backgroundColor: "#fafafa" }}>
              <th className="p-4">Cabs from Delhi</th>
              <th className="p-4">Included kms & Extra fare</th>
              <th className="p-4">Cab Price</th>
            </tr>
          </thead>
          <tbody>
            <CabTableInner />
          </tbody>
        </table>
      </div>
    </div>
  );
};

export default CabTable;
