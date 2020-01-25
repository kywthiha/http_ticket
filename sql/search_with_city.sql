SELECT schedule.s_id,schedule.departure_time,schedule.arrival_time,schedule.price,route_detail.route_id,bus.type,bus.no_of_seat,bus_operator.bus_operator_name,bus_operator.email,bus_operator.phone_no,route.title,A.source_id AS source_id,route_detail.city_id AS destination_id,GROUP_CONCAT(city.c_name ORDER BY route_detail.location SEPARATOR '-') AS route_city_detail
FROM route_detail
INNER JOIN
(SELECT route_detail.route_id,route_detail.location,route_detail.city_id AS source_id
FROM route_detail
WHERE route_detail.city_id = 11) AS A
ON A.route_id = route_detail.route_id AND A.location < route_detail.location AND route_detail.city_id = 12
INNER JOIN route ON route.r_id = route_detail.route_id
INNER JOIN schedule ON schedule.route_id = route.r_id
INNER JOIN bus ON bus.bus_id = schedule.bus_id
INNER JOIN bus_operator ON bus_operator.bus_operator_id = bus.bus_id
INNER JOIN route_detail AS rd ON rd.route_id = route_detail.route_id
INNER JOIN city ON city.c_id = rd.city_id
GROUP BY schedule.s_id
ORDER BY schedule.s_id