set @my_lat = -23.533773 ; -- the source latitude for Las Vegas, NV
set @my_lon = -46.625290 ;-- the source longitude for Las Vegas, NV
;


select *, ( 3959 * acos( cos( radians(
-- latitude
@my_lat) ) * cos( radians( 
endereco.latitude ) ) * cos( radians( 
endereco.longitude ) - radians(
-- longitude
@my_lon) ) + sin( radians(
-- latitude
@my_lat) ) * sin( radians( 
endereco.latitude ) ) ) ) AS distance 
-- table containing targets to compare distance
from endereco
order by distance
;