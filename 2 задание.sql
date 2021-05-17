SELECT 
    communities.id,
    communities.name,
    permissions.name,
    COUNT(community_member_permissions.member_id)
FROM
    communities,
    permissions,
    community_member_permissions
        JOIN
    community_members ON community_member_permissions.member_id = community_members.id
WHERE
    permissions.id = community_member_permissions.permission_id
        AND communities.id = community_members.community_id
GROUP BY permissions.id , communities.id
HAVING COUNT(community_member_permissions.member_id) >= 5
ORDER BY communities.id DESC , COUNT(community_member_permissions.member_id) ASC
LIMIT 100;